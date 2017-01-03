({
    extendsFrom: 'FooterLayout',

    initialize: function(options) {
        this._super('initialize', [options]);

        app.events.on("sudo_status_changed", this.sudoChanged, this);
    },

    sudoChanged: function(data) {
        this.sudo_data = data;

        this.render();
    }
})