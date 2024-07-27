<?php

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;

trait  Expo
{
    public function sendExpoNotify($user , $data){
        foreach ($user->devices as $token){
            try{
                $interestDetails    = ["$token->device_id", $token->device_id];
                $expo               = \ExponentPhpSDK\Expo::normalSetup();
                $expo->subscribe($interestDetails[0], $interestDetails[1]);
                $notification       = [
                    'title'                  => $data['title_'.lang()],
                    'body'                   => $data['message_'.lang()] ,
                    'data'                   => json_encode($data['data']),
                    'sound'                  => 'default',
                ];
                $expo->notify($interestDetails[0], $notification);
            }catch (Throwable $e){

            }
        }
    }

	// function Send_FCM( $device_id, $device_type = 'android', $sent_data )
	// {
    //     $sent_data['title'] = 'Life Care';
	// 	$optionBuilder = new OptionsBuilder();
	// 	$optionBuilder -> setTimeToLive( 60 * 20 );
	// 	$notificationBuilder = new PayloadNotificationBuilder( $sent_data[ 'title' ] );
	// 	$notificationBuilder -> setBody( $sent_data[ 'body' ] ) -> setSound( 'default' );


	// 	$option       = $optionBuilder -> build();
	// 	$notification = $notificationBuilder -> build();
	// 	$dataBuilder  = new PayloadDataBuilder();
	// 	$dataBuilder -> addData( $sent_data );
	// 	$data  = $dataBuilder -> build();
	// 	$token = $device_id;


	// 	if ( $device_type == 'android' ) {
	// 		$downstreamResponse = FCM ::sendTo( $token, $option, null, $data );
	// 	} else {
	// 		$downstreamResponse = FCM ::sendTo( $token, $option, $notification, $data );
	// 	}

	// 	$downstreamResponse -> numberSuccess();
	// 	$downstreamResponse -> numberFailure();
	// 	$downstreamResponse -> numberModification();
	// }

    // function notifyUser( $user, $not )
    // {
    // //		if ( availableUser( $user ) ) {

    //     //            dd($user->device);
    //     foreach ( $user -> devices as $device ) {
    //         if ( $device -> device_id && $device -> device_type )
    //             Send_FCM( $device -> device_id, $not, $device -> device_type );

    //     }
    // //		}

    // }
}

