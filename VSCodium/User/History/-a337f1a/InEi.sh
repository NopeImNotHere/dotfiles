#!/bin/sh
set -m
if [ $(bluetoothctl show | grep "Powered: yes" | wc -c) -eq 0 ]; then
    echo "%{F#66ffffff}"
else
    if [ $(echo info | bluetoothctl | grep 'Device' | wc -c) -eq 0 ]; then
        echo ""
    fi
    devices = bluetoothctl devices | cut -f2 -d' ' | while read uuid; do bluetoothctl info $uuid; done | grep -e "Device\|Connected\|Name"
    echo "%{F#2193ff} Test"
fi
