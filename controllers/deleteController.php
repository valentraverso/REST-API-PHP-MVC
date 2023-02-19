<?php
require_once BASE_PATH.'/models/deleteModel.php';

class DeleteController {
    static public function deleteData( $table, $colId, $id) {
        $post = new DeleteModel();
        $response = $post->deleteData( $table, $colId, $id );

        return DeleteController::response( $response );
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
                'results' => 'Record deleted'
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