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
    extendsFrom: 'DashablelistView',

    render: function(){
        this._super('render');

        var view = this;
        $("a[name=export_button]").click(function(){
            view.exportClicked();
        });
    },

    exportClicked: function () {
        var module = this.module;
        var massExport = this.collection;
        app.api.exportRecords({
                module: module,
                uid: massExport.pluck('id')
            },
            this.$el,
            {
                complete: function(data) {
                    app.alert.dismiss('massexport_loading');
                }
            });
    }
})
