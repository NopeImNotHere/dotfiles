#!/bin/bash

# Specify the folder path where you want to search for the directory
folder_path="/sys/class/backlight"

# Find the directory containing "amdgpu" in its name
amdgpu_directory=$(find "/sys/class/backlight" -name "*amdgpu*" -ls)

if [ -n "$amdgpu_directory" ]; then
    echo "Found directory: $amdgpu_directory"
    cd "$amdgpu_directory" || exit 1
    # You are now inside the directory containing "amdgpu" in its name
else
    echo "Directory not found."
fi
