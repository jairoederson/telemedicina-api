<?php

namespace App\Http\Controllers\Push;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Notification;

class PushNotificacionController extends Controller
{

  public function vexSendNotificacionCallIncoming(Request $request)
  {
    $user = User::findOrFail($request->get('user_id'));
    $tokens = json_decode($user->token_mobile, true);
    $platform = $user->platform;

    if($tokens == null){
      return response()->json(['message'=>'Token del usuario no encontrado', 'code'=>404, 'status'=>false]);
    }else{
    
      $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

      $data_extra = "";
      if($request->get('data')){
        $data_extra = $request->get('data');
      }

      // ANDROID
      $notificationAndroid = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationAndroid = [
        'to'        => $tokens['tokens']['android'][0],
        'data' => $notificationAndroid,
      ];

      // IOS
      $notificationIOS = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationIOS = [
        'to'        => $tokens['tokens']['ios'][0],
        'notification' => $notificationIOS,
        'priority'=>'high'
      ];

      // WEB
      $notificationWEB = [
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'icon' => "https://media.licdn.com/dms/image/C4E0BAQH8PxcHZQgv5A/company-logo_200_200/0?e=2159024400&v=beta&t=S9hxmXpMNw5ai6V3AdqL-zoR6d7BcWdvwjOQRQkhc1s",
      ];
      $fcmNotificationWEB = [
        'to'        => $tokens['tokens']['web'][0],
        'notification' => $notificationWEB,
      ];
      
      $notifications = [$fcmNotificationAndroid, $fcmNotificationIOS, $fcmNotificationWEB];


      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationAndroid));
      $result = curl_exec($ch);
      curl_close($ch);
      
      
      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationIOS));
      $result = curl_exec($ch);
      curl_close($ch);
      
      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationWEB));
      $result = curl_exec($ch);
      curl_close($ch);
      
      $notification_to_save = array(
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'data' => $request->get('data'),
        'seen' => 0,
        'type_notification' => 'call',
        'user_id' => $request->get('user_id')
      );

      Notification::create($notification_to_save);
      
      return response()->json(['message'=>'Notificaciones enviadas', 'code'=>201, 'status'=>true, 'data'=>$result]);
    }
  }

  public function vexSendNotificacionWeb(Request $request) 
  {
    $user = User::findOrFail($request->get('user_id'));
    $token = $user->token_mobile;
    $platform = $user->platform;

    if($token == null){
      return response()->json(['message'=>'Token del usuario no encontrado', 'code'=>404, 'status'=>false]);
    }else{
    
      $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

      $data_extra = "";
      if($request->get('data')){
        $data_extra = $request->get('data');
      }

      $notification = [
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'icon' => "https://media.licdn.com/dms/image/C4E0BAQH8PxcHZQgv5A/company-logo_200_200/0?e=2159024400&v=beta&t=S9hxmXpMNw5ai6V3AdqL-zoR6d7BcWdvwjOQRQkhc1s",
      ];
      
      
      $fcmNotification = [
        'to'        => $token,
        'notification' => $notification,
      ];
      
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
      $result = curl_exec($ch);
      curl_close($ch);

      $notification_to_save = array(
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'data' => $request->get('data'),
        'seen' => 0,
        'user_id' => $request->get('user_id')
      );

      Notification::create($notification_to_save);
      
      return response()->json(['message'=>'Notificacion enviada', 'code'=>201, 'status'=>true, 'data'=>$result]);
    }
  }

  public function vexSolucionesNotificationNewRecipe(Request $request) 
  {
    $user = User::findOrFail($request->get('user_id'));
    $tokens = json_decode($user->token_mobile, true);
    $platform = $user->platform;

    if($tokens == null){
      return response()->json(['message'=>'Token del usuario no encontrado', 'code'=>404, 'status'=>false]);
    }else{
    
      $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

      $data_extra = "";
      if($request->get('data')){
        $data_extra = $request->get('data');
      }

      // ANDROID
      $notificationAndroid = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationAndroid = [
        'to'        => $tokens['tokens']['android'][0],
        'data' => $notificationAndroid,
      ];

      // IOS
      $notificationIOS = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationIOS = [
        'to'        => $tokens['tokens']['ios'][0],
        'notification' => $notificationIOS,
        'priority'=>'high'
      ];

      // WEB
      $notificationWEB = [
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'icon' => "https://media.licdn.com/dms/image/C4E0BAQH8PxcHZQgv5A/company-logo_200_200/0?e=2159024400&v=beta&t=S9hxmXpMNw5ai6V3AdqL-zoR6d7BcWdvwjOQRQkhc1s",
      ];
      $fcmNotificationWEB = [
        'to'        => $tokens['tokens']['web'][0],
        'notification' => $notificationWEB,
      ];
      
      $notifications = [$fcmNotificationAndroid, $fcmNotificationIOS, $fcmNotificationWEB];


      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationAndroid));
      $result = curl_exec($ch);
      curl_close($ch);

      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationIOS));
      $result = curl_exec($ch);
      curl_close($ch);

      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationWEB));
      $result = curl_exec($ch);
      curl_close($ch);
      
      $notification_to_save = array(
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'data' => $request->get('data'),
        'seen' => 0,
        'type_notification' => 'receta',
        'user_id' => $request->get('user_id')
      );

      Notification::create($notification_to_save);
      
      return response()->json(['message'=>'Notificaciones enviadas', 'code'=>201, 'status'=>true, 'data'=>$result]);
    }
  
  }

  public function vexSolucionesNotificationNewResultLaboratory( Request $request) 
  {
    $user = User::findOrFail($request->get('user_id'));
    $tokens = json_decode($user->token_mobile, true);
    $platform = $user->platform;

    if($tokens == null){
      return response()->json(['message'=>'Token del usuario no encontrado', 'code'=>404, 'status'=>false]);
    }else{
    
      $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

      $data_extra = "";
      if($request->get('data')){
        $data_extra = $request->get('data');
      }

      // ANDROID
      $notificationAndroid = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationAndroid = [
        'to'        => $tokens['tokens']['android'][0],
        'data' => $notificationAndroid,
      ];

      // IOS
      $notificationIOS = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationIOS = [
        'to'        => $tokens['tokens']['ios'][0],
        'notification' => $notificationIOS,
        'priority'=>'high'
      ];

      // WEB
      $notificationWEB = [
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'icon' => "https://media.licdn.com/dms/image/C4E0BAQH8PxcHZQgv5A/company-logo_200_200/0?e=2159024400&v=beta&t=S9hxmXpMNw5ai6V3AdqL-zoR6d7BcWdvwjOQRQkhc1s",
      ];
      $fcmNotificationWEB = [
        'to'        => $tokens['tokens']['web'][0],
        'notification' => $notificationWEB,
      ];
      
      $notifications = [$fcmNotificationAndroid, $fcmNotificationIOS, $fcmNotificationWEB];


      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationAndroid));
      $result = curl_exec($ch);
      curl_close($ch);

      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationIOS));
      $result = curl_exec($ch);
      curl_close($ch);
      
      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationWEB));
      $result = curl_exec($ch);
      curl_close($ch);
      
      $notification_to_save = array(
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'data' => $request->get('data'),
        'seen' => 0,
        'type_notification' => 'laboratorio',
        'user_id' => $request->get('user_id')
      );

      Notification::create($notification_to_save);
      
      return response()->json(['message'=>'Notificaciones enviadas', 'code'=>201, 'status'=>true, 'data'=>$result]);
    }
  
  }

  public function vexSolucionesNotificationNewOrder( Request $request) 
  {
    $user = User::findOrFail($request->get('user_id'));
    $tokens = json_decode($user->token_mobile, true);
    $platform = $user->platform;

    if($tokens == null){
      return response()->json(['message'=>'Token del usuario no encontrado', 'code'=>404, 'status'=>false]);
    }else{
    
      $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

      $data_extra = "";
      if($request->get('data')){
        $data_extra = $request->get('data');
      }

      // ANDROID
      $notificationAndroid = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationAndroid = [
        'to'        => $tokens['tokens']['android'][0],
        'data' => $notificationAndroid,
      ];

      // IOS
      $notificationIOS = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationIOS = [
        'to'        => $tokens['tokens']['ios'][0],
        'notification' => $notificationIOS,
        'priority'=>'high'
      ];

      // WEB
      $notificationWEB = [
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'icon' => "https://media.licdn.com/dms/image/C4E0BAQH8PxcHZQgv5A/company-logo_200_200/0?e=2159024400&v=beta&t=S9hxmXpMNw5ai6V3AdqL-zoR6d7BcWdvwjOQRQkhc1s",
      ];
      $fcmNotificationWEB = [
        'to'        => $tokens['tokens']['web'][0],
        'notification' => $notificationWEB,
      ];
      
      $notifications = [$fcmNotificationAndroid, $fcmNotificationIOS, $fcmNotificationWEB];


      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationAndroid));
      $result = curl_exec($ch);
      curl_close($ch);
      
      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationIOS));
      $result = curl_exec($ch);
      curl_close($ch);
      
      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationWEB));
      $result = curl_exec($ch);
      curl_close($ch);
      
      $notification_to_save = array(
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'data' => $request->get('data'),
        'seen' => 0,
        'type_notification' => 'orden',
        'user_id' => $request->get('user_id')
      );

      Notification::create($notification_to_save);
      
      return response()->json(['message'=>'Notificaciones enviadas', 'code'=>201, 'status'=>true, 'data'=>$result]);
    }
  
  }

  public function vexSolucionesNotificationNewPatientToConsulta( Request $request) 
  {
    $user = User::findOrFail($request->get('user_id'));
    $tokens = json_decode($user->token_mobile, true);
    $platform = $user->platform;

    if($tokens == null){
      return response()->json(['message'=>'Token del usuario no encontrado', 'code'=>404, 'status'=>false]);
    }else{
    
      $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

      $data_extra = "";
      if($request->get('data')){
        $data_extra = $request->get('data');
      }

      // ANDROID
      $notificationAndroid = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationAndroid = [
        'to'        => $tokens['tokens']['android'][0],
        'data' => $notificationAndroid,
      ];

      // IOS
      $notificationIOS = [
        'title' => $request->get('title'),
        'text' => $request->get('body'),
        'sound' => true,
        'data' => $data_extra
      ];
      $fcmNotificationIOS = [
        'to'        => $tokens['tokens']['ios'][0],
        'notification' => $notificationIOS,
        'priority'=>'high'
      ];

      // WEB
      $notificationWEB = [
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'icon' => "https://media.licdn.com/dms/image/C4E0BAQH8PxcHZQgv5A/company-logo_200_200/0?e=2159024400&v=beta&t=S9hxmXpMNw5ai6V3AdqL-zoR6d7BcWdvwjOQRQkhc1s",
      ];
      $fcmNotificationWEB = [
        'to'        => $tokens['tokens']['web'][0],
        'notification' => $notificationWEB,
      ];
      
      $notifications = [$fcmNotificationAndroid, $fcmNotificationIOS, $fcmNotificationWEB];


      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationAndroid));
      $result = curl_exec($ch);
      curl_close($ch);
      
      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationIOS));
      $result = curl_exec($ch);
      curl_close($ch);
      
      # Envio de notificaciones a todas las plataformas
      $headers = [
        'Authorization: key=AAAAKWl34Yo:APA91bEWk7Dckom3KR0JuK8o3w2b1e7NUiw1-YUvVYN37HwYV9OAKAmw2mbUZNWV4wEqWZGxSBD7z8W2ZfjlVidlZP2Y2655Qrj_EacZeQ4H2oj6jthPo4MtyWRjUeRyx6cY7E8J-vpc',
        'Content-Type: application/json'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotificationWEB));
      $result = curl_exec($ch);
      curl_close($ch);
      
      $notification_to_save = array(
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'data' => $request->get('data'),
        'seen' => 0,
        'type_notification' => 'query',
        'user_id' => $request->get('user_id')
      );

      Notification::create($notification_to_save);
      
      return response()->json(['message'=>'Notificaciones enviadas', 'code'=>201, 'status'=>true, 'data'=>$result]);
    }
  
  }

  public function vexGetNotifications($user_id)
  {
    
    $notifications = Notification::where('user_id', $user_id)
    ->orderBy('created_at', 'desc')
    ->get();

    if(count($notifications) == 0){
      return response()->json(['message'=>'No se encontro un historial de notificaciones', 'code'=>404, 'status'=>false]);
    }
    return response()->json(['message'=>'Historial de notificaciones', 'code'=>201, 'status'=>true, 'data'=>$notifications]);
  }

  public function vexUpdateNotification(Request $request)
  {
    $notification = Notification::findOrFail($request->get('notification_id'));
    // return $request->get('state');
    // return response()->json($request->get('state'));
    $notification->seen = $request->get('seen');
    $notification->save();

    return response()->json(['message'=>'Actualizacion de estado de la notificacion', 'code'=>200, 'status'=>true]);
  }
}
