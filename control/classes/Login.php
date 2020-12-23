<?php

class Login 
{
        public static function isLoggedIn() 
        {
                $date = date('Y-m-d H:i:s');
                if (isset($_COOKIE['ADMN'])) 
                {
                        if (DB::query('SELECT user_id FROM admin_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['ADMN'])))) 
                        {
                                $userid = DB::query('SELECT user_id FROM admin_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['ADMN'])))[0]['user_id'];

                                if (isset($_COOKIE['ADMN_'])) 
                                {
                                        return $userid;
                                } 
                                else 
                                {
                                        $cstrong = True;
                                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                        DB::query('INSERT INTO admin_tokens VALUES (\'\', :token, :user_id, :date)', array(':token'=>sha1($token), ':user_id'=>$userid,':date'=>$date));
                                        DB::query('DELETE FROM admin_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['ADMN'])));

                                        setcookie("ADMN", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                                        setcookie("ADMN_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid; 
                                }
                        }
                }

                return false;
        }
}

?>
