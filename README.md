# ranklist
## Introduction
Merge onsite/online Rank List Based on `judge.ceit.aut.ac.ir` and `daavar.ceit.aut.ac.ir`.

## Nginx
```
        location /ranklist {
                location ~ \.php$ {
                        fastcgi_pass unix:/run/php/php7.2-fpm.sock;
                        include snippets/fastcgi-php.conf;
                        fastcgi_param SCRIPT_FILENAME $request_filename;
                }
                try_files $uri $uri/ @nested;

                alias     /home/parham/Documents/Git/parham/ranklist/;
                index    index.php;
        }

        location @nested {
                rewrite /ranklist/(.*)$ /ranklist/index.php?/$1 last;
        }
```
