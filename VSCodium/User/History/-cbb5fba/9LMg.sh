#!/bin/bash

# Specify the folder path where you want to search for the directory
folder_path="/path/to/your/folder"

# Find the directory containing "amdgpu" in its name
amdgpu_directory=$(find "$folder_path" -type d -name "*amdgpu*" -print -quit)

if [ -n "$amdgpu_directory" ]; then
    echo "Found directory: $amdgpu_directory"
    cd "$amdgpu_directory" || exit 1
    # You are now inside the directory containing "amdgpu" in its name
else
    echo "Directory not found."
fi
