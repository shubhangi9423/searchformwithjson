#!/usr/bin/env bash
## Configure Apache
## Only thing you probably really care about is right here
DOMAIN=searchbox.com
	   
            echo "Creating vhost config for $DOMAIN..."
            sudo cp /etc/apache2/sites-available/scotchbox.local.conf /etc/apache2/sites-available/$DOMAIN.conf

            echo "Updating vhost config for $DOMAIN..."
            sudo sed -i s,scotchbox.local,$DOMAIN,g /etc/apache2/sites-available/$DOMAIN.conf
            sudo sed -i s,/var/www/,/var/www/,g /etc/apache2/sites-available/$DOMAIN.conf

            echo "Enabling $DOMAIN. Will probably tell you to restart Apache..."
            sudo a2ensite $DOMAIN.conf

            echo "So let's restart apache..."
            sudo service apache2 restart
     		
## End Configure Aapche

