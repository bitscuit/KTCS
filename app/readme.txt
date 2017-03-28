Naming conventions
--------------------

1. Controller names: <controller_name>_controller.php
2. Controller actions that change the view: getView<view_name>()
3. Views folder names: <controller_name>


Things to keep in mind
--------------------

1. When adding in a new controller, REMEMBER to modify routes.php to recognize this new controller and its actions
2. When setting controller variables, only have the <controller_name>, not <controller_name>_controller.php
