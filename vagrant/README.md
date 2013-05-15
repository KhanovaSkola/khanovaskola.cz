# Vagrant

## Setup

1. Download Vagrant at

	http://www.vagrantup.com/

2. Set up custom hosts on your local machine (`/etc/host` location differs on Windows)
```
echo "192.168.13.37 local.khanovaskola.cz" >> /etc/hosts
echo "192.168.13.37 local.khancdn.eu" >> /etc/hosts
```

3. Edit `/app/config/config.local.neon`

## Usage

Start the machine
```
vagrant up
```

View the application at `local.khanovaskola.cz` (see Setup 2.). Database can be managed at `http://local.khanovaskola.cz/adminer/index.php`.
