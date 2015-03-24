      <?php $pieces = null;
             $link = null;
             if(strpos($text,'https:') == true){
                $link = explode("https:", $text );
                $pieces = explode('"', $link[0] );
                $link = explode('"', $link[1] );
                $link = explode(' ', $link[0] );
             }else if(strpos($text,'http:') == true){
                $link = explode("http:", $text );
                $pieces = explode('"', $link[0] );
                $link = explode('"', $link[1] );
                $link = explode(' ', $link[0] );

             }else{
               $pieces = explode('"', $text );
             }