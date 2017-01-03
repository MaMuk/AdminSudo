function loginAs(user_name) {
    app.api.call('read', app.api.buildURL('logInAs/' + user_name), null, {
        success: function (data) {
            app.sync();
        }
    });
}