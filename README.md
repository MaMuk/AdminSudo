# Sugar Labs Admin Sudo

Sugar Labs Admin Sudo allows admin users the ability to login as other users in the Sugar instance. There are three packages for this:
* sudo_user.zip: Provides initial ability for admin to login as another user. Once logged in as the other user, all access control/security settings defined for that user are considered. Meaning the admin will see only the data that user would see, and be able to perform onyl the actions/edits that user could perform.
* SudoAudit2016_11_08_114528.zip: Provides an audit log of all changes made by admin while logged in as another user. This only works for fields marked in Studio as 'Audit'.
* exportable_list.zip: Provides ability to export the audit list as a CSV file.

## Installation & Use
* Download the latest .tgz package here: https://github.com/sugarcrmlabs/AdminSudo/releases/latest
* Load the package in your target instance using Module Loader
* Log in as an admin user
* Navigate to the desired user's record view (through User Management for example)
* Under the actions dropdown select the action 'Login as <user naem here>'
* View needed data, or perform required actions
* Once complete, click on user icon (top right) and select teh action 'Back to admin'
* To view the audit log, navigate to the menu entry 'Sudo Audit'
* From here, the audit log can be exported by pressing the button 'Export' above the audit log list
```

## Contributing
Everyone is welcome to contribute to this project! If you make a contribution, then the [Contributor Terms](CONTRIBUTOR_TERMS.pdf) apply to your submission.

Please check out our [Contribution Guidelines](CONTRIBUTING.md) for helpful hints and tips that will make it easier for us to accept your pull requests.

-----
Copyright (c) 2016 SugarCRM Inc. Licensed by SugarCRM under the Apache 2.0 license.
