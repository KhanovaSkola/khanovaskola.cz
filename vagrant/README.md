# Vagrant

## Setup

1. Download Vagrant at

	http://www.vagrantup.com/

2. (OPTIONAL) Set up custom hosts on your local machine (`/etc/host` location differs on Windows)
```
echo "127.0.0.1:7080 local.khanovaskola.cz" >> /etc/hosts
echo "127.0.0.1:7080 local.khancdn.eu" >> /etc/hosts
```

3. Edit `/app/config/config.local.neon`

## Usage

Start the machine
```
vagrant up
```

View the application at `127.0.0.1:7080` or at your custom host (see Setup 2.). Database can be managed at `http://localhost:7080/adminer/index.php`.
