({
    extendsFrom: 'ListHeaderpaneView',

    initialize: function(options) {
        this._super("initialize", [options]);

        this.context.on('button:export_button:click', this.exportClicked, this);
    },

    exportClicked: function() {
        var module = this.context.attributes.module;
        var massExport = this.context.get("collection");
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