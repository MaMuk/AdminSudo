/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
({
    extendsFrom: 'ProfileactionsView',

    events: {
        'click .back-to-admin': 'backToAdmin'
    },

    render: function () {
        this.context.sudo_status = "";
        var view = this;

        if (!_.isUndefined(app.user.get('id'))) {
            var backToSudo = {
                'route': 'javascript:void(0)',
                'label': 'Back to Admin',
                'css_class': 'profileactions-employees back-to-admin',
                'acl_action': 'list',
                'icon': 'fa-reply',
                'submenu': ''
            };

            app.api.call('read', app.api.buildURL('getState'), null, {
                success: function (data) {
                    app.events.trigger("sudo_status_changed", data);
                    if (data.in_sudo == true) {
                        if (_.isUndefined(_.findWhere(view.meta, backToSudo))) {
                            view.meta.push(backToSudo);
                            view._super('render');
                        }
                    } else {
                        if (!_.isUndefined(_.findWhere(view.meta, backToSudo))) {
                            view.meta = _.without(view.meta, _.findWhere(view.meta, backToSudo));
                            view._super('render');
                        }
                    }
                }
            });

        }

        this._super('render');
    },

    backToAdmin: function () {
        app.api.call('read', app.api.buildURL('backToAdmin'), null, {
            success: function (data) {
                app.sync();
            }
        });
    }
})