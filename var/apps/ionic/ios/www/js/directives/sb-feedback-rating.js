App.directive('sbFeedbackRating', ['$timeout', function ($timeout) {
	return {
		restrict: 'EA',
		require: ['sbFeedbackRating', 'ngModel'],
		scope: {
			readonly: '=?'
		},
		template: '<ul class="rating" ng-keydown="onKeydown($event)">' + '<li ng-repeat="r in range track by $index" ng-click="rate($index + 1)"><i class="icon" ng-class="value === undefined ? (r === 1 ? \'ion-ios-star\' : (r === 2 ? \'ion-ios-star-half\' : \'ion-ios-star-outline\')) : (value > $index ? (value < $index+1 ? \'ion-ios-star-half\' : \'ion-ios-star\') : \'ion-ios-star-outline\')"></i></li>' + '</ul>',
		replace: true,
		link: function (scope, element, attrs, ctrls) {
			var ngModelCtrl, ratingCtrl;
			ratingCtrl = ctrls[0];
			ngModelCtrl = ctrls[1];
			if (ngModelCtrl) {
				$timeout(function () {
					return ratingCtrl.init(ngModelCtrl);
				})
			}
		},
		controller: function ($scope, $attrs, FEEDBACK_CONFIG) {
			var ngModelCtrl;
			ngModelCtrl = {
				$setViewValue: angular.noop
			};
			this.init = function (ngModelCtrl_) {
				var max;
				ngModelCtrl = ngModelCtrl_;
				ngModelCtrl.$render = this.render;
				max = angular.isDefined($attrs.max) ? $scope.$parent.$eval($attrs.max) : FEEDBACK_CONFIG.max;
				return $scope.range = this.buildTemplateObjects(ngModelCtrl.$modelValue, max);
			};
			this.buildTemplateObjects = function (stateValue, max) {
				var j, states = [];
				for (j = 0; j < max; j++) {
					if (stateValue > j && stateValue < j + 1) {
						states[j] = 2;
					} else if (stateValue > j) {
						states[j] = 1;
					} else {
						states[j] = 0;
					}
				}
				return states;
			};
			$scope.rate = function (value) {
				if (!$scope.readonly && value >= 0 && value <= $scope.range.length) {
					ngModelCtrl.$setViewValue(value);
					return ngModelCtrl.$render();
				}
			};
			$scope.onKeydown = function (evt) {
				if (/(37|38|39|40)/.test(evt.which)) {
					evt.preventDefault();
					evt.stopPropagation();
					return $scope.rate($scope.value + (evt.which === 38 || evt.which === 39 ? {1: -1} : void 0));
				}
			};
			this.render = function () {
				return $scope.value = ngModelCtrl.$viewValue;
			};
			return this;
		}
	};
}]);
