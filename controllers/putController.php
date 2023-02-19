<?php
require_once BASE_PATH.'/models/putModel.php';

class PutController {
    static public function putData( $table, $data, $colId, $id ) {
        $post = new PutModel();
        $response = $post->putData( $table, $data, $colId, $id );

        return PutController::response( $response );
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
                'results' => $response[ 'results' ]
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