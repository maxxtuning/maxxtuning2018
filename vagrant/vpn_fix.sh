#!/bin/bash
echo "Disconnect from VPN!!"
read -p "Confirm when done?" choice
dscacheutil -flushcache && vagrant halt && sudo ifconfig vboxnet0 down && sudo ifconfig vboxnet0 up && sudo ifconfig vboxnet1 down && sudo ifconfig vboxnet1 up && sudo ifconfig vboxnet2 down && sudo ifconfig vboxnet2 up && sudo ifconfig vboxnet3 down && sudo ifconfig vboxnet3 up && vagrant up
