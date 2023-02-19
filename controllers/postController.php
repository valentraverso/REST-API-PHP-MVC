<?php
require_once BASE_PATH.'/models/postModel.php';

class PostController {
    static public function postData( $table, $data ) {
        $post = new PostModel();
        $response = $post->postData( $table, $data );

        return PostController::response( $response );
    }

    static protected function response( $response ) {
        if ( is_array( $response ) ) {
            if ( !empty( $response[ 'status' ] ) ) {
                if ( $response[ 'status' ] === 'error' ) {
                    $json = array(
                        'status' => 400,
                        'results' => $response[ 'results' ]
                    );

                    return $json;
                }
            }
            $json = array(
                'status' => 200,
                'lastId' => $response['lastId'],
                'results' => $response['results']
            );
            return $json;
        } else {
            $json = array(
                'status' => 400,
                'results' => 'There was a problem'
            );
        }

        return $json;
    }
}