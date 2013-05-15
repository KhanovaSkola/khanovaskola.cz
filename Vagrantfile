Vagrant.configure("2") do |config|
	config.vm.box = 'debsqueeze64'
	config.vm.box_url = 'http://www.emken.biz/vagrant-boxes/debsqueeze64.box'

	config.vm.hostname = "khanovaskola"

	# Make this VM reachable on the host network as well, so that other
	# VM's running other browsers can access our dev server.
	config.vm.network :private_network, ip: "192.168.13.37"
	config.vm.network :forwarded_port, host: 7080, guest: 80

	config.vm.provision :shell, :path => "vagrant/provision.sh"

	# Imitate real server setup
	config.vm.synced_folder ".", "/srv/sites/khanovaskola.cz", :owner => "www-data", :extra => 'dmode=770,fmode=770'
end
