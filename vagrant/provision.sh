#!/bin/sh

if [ ! -f /var/provisioned ]
then
	# preseed MySQL password to "root" so it can be installed without TTY
	echo 'mysql-server-5.5 mysql-server/root_password password root' | sudo debconf-set-selections
	echo 'mysql-server-5.5 mysql-server/root_password_again password root' | sudo debconf-set-selections

	# add php54 source
	sudo cp /vagrant/vagrant/sources.list /etc/apt/sources.list.d/php54.list
	wget http://www.dotdeb.org/dotdeb.gpg
	cat dotdeb.gpg | sudo apt-key add -
	sudo rm -rf dotdeb.gpg

	sudo apt-get update
	sudo apt-get install \
		php5 php5-apc php5-cli php5-common php5-curl php5-fpm php5-gd php5-mysql \
		mysql-client-5.5 mysql-client-core-5.5 mysql-common mysql-server-5.5 mysql-server-core-5.5 \
		nginx \
		git \
		zsh \
		--quiet --assume-yes

	echo "listen = /var/run/php5-fpm.sock" | sudo tee -a /etc/php5/fpm/php-fpm.conf > /dev/null

	# install OhMyZSH
	curl -L https://github.com/robbyrussell/oh-my-zsh/raw/master/tools/install.sh | sh
	sudo chsh -s /bin/zsh vagrant

	echo "PROMPT='Vagrant %{$fg_bold[red]%}➜ %{$fg_bold[green]%}%p %{$fg[cyan]%}%c %{$fg_bold[blue]%}$(git_prompt_info)%{$fg_bold[blue]%} % %{$reset_color%}'" > ~/.zshrc

	if [ ! -f /srv/sites/khanovaskola.cz/app/config/config.local.neon ]
	then
		cp /srv/sites/khanovaskola.cz/app/config/config.local.neon{.sample,}
		echo "Don't forget to edit /app/config/config.local.neon"
	fi

	sudo touch /var/provisioned

else
	echo Already provisioned
fi

sudo mkdir -p /tmp/khanovaskola.cz

sudo rm -rf /etc/nginx/nginx.conf
sudo ln -s /vagrant/vagrant/nginx.conf /etc/nginx/nginx.conf
sudo /etc/init.d/php5-fpm restart
sudo /etc/init.d/nginx restart

sudo php /srv/sites/khanovaskola.cz/db/migrate.php local
