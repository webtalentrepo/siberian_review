App.config(function ($stateProvider) {

	$stateProvider.state('feedback-view', {
		cache: false,
		url: BASE_PATH + '/feedback/mobile_view/index/value_id/:value_id',
		controller: 'FeedbackWriteController',
		templateUrl: 'templates/feedback/l1/view.html'
	});

}).controller('FeedbackWriteController', function ($rootScope, $scope, $stateParams, $translate, Customer, Dialog, Feedback) {

	$scope.$on('connectionStateChange', function (event, args) {
		if (args.isOnline == true) {
			$scope.loadContent();
		}
	});
	
	$scope.is_logged_in = Customer.isLoggedIn();
	console.log($scope.is_logged_in);
	$scope.is_loading = true;
	$scope.value_id = Feedback.value_id = $stateParams.value_id;
	$scope.feedbackData = {};
	$scope.feedbackData.feedback_content = '';

	$scope.page_title = '';
	$scope.customer_id = '';
	$scope.loadContent = function () {
		$scope.is_loading = true;
		$scope.feedbackData = {};
		$scope.feedbackData.feedback_content = '';
		$scope.page_title = '';
		$scope.customer_id = '';
		$scope.value_id = Feedback.value_id = $stateParams.value_id;
		Feedback.findAll().success(function (data) {
			$scope.page_title = data.page_title;
			$scope.customer_id = data.customer_id;
			$scope.feedbackData.feedback_content = data.feedback_content;
		}).error(function () {

		}).finally(function () {
			$scope.is_loading = false;
			$scope.closeFeedbackModal();
		});

	};

	$scope.closeFeedbackModal = function() {
		// Feedback.modal.hide();
	};

	$scope.post = function () {
		$scope.feedbackData = {
			'customer_id': $scope.customer_id,
			'value_id': $scope.value_id,
			'feedback_content': $scope.feedbackData.feedback_content
		};
		$scope.is_loading = true;

		Feedback.post($scope.feedbackData).success(function (data) {
			$scope.feedbackData = {};
			if (data.success) {
				Dialog.alert('', data.message, $translate.instant('OK'));
				$scope.loadContent();
				// $scope.closeFeedbackModal();
			}
		}).error(function (data) {
			if (data && angular.isDefined(data.message)) {
				Dialog.alert($translate.instant('Error'), data.message, $translate.instant('OK'));
			}
		}).finally(function () {
			$scope.is_loading = false;
		});
	};

	$scope.loadContent();

});