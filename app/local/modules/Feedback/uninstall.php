<?php
# Feedback un-installer
$name = "Feedback";

# Clean-up library icons
Siberian_Feature::removeIcons($name);
Siberian_Feature::removeIcons("{$name}-flat");

$code = "feedback";
Siberian_Feature::uninstallFeature($code);

#Clean-up DB be really careful with this.
$tables = array('feedback');
Siberian_Feature::dropTables($tables);

#Clean-up module
Siberian_Feature::uninstallModule($name);