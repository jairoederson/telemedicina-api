export function requestPermisionBrowser(data){
    let options = {
        body: data.notification.body,
        icon: data.notification.icon
    }
    if ( !window.Notification ) {
        console.log('Este navegador no soporta notificaciones')
        return;
    }

    console.log(Notification.permission)
    if ( Notification.permission === 'granted' ) {
        
        let not = new Notification(data.notification.title, options)
        setTimeout(not.close.bind(not), 100000); 
    } else if ( Notification.permission == 'denied') {
        Notification.requestPermission( function(permission) {
            console.log( permission )

            if( permission === 'granted' ){
                let not = new Notification(data.notification.title, options)
                setTimeout(not.close.bind(not), 100000); 
            }
        })
    }
}

export function PushNotificacion(data){
    Push.create(data.title, {
        body: `${data.body}`,
        icon: '/assets/images/farmacias-logo.png',
        timeout: 10000,
        onClick: function () {
          window.focus();
          this.close();
        }
    });

    console.log('data', data)
}