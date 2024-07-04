#!/bin/bash

# Vérifier si un argument est passé au script
if [ -z "$1" ]; then
  echo "Usage: $0 <bit.ly URL>"
  exit 1
fi

# Utiliser curl pour obtenir les en-têtes HTTP et suivre les redirections
response=$(curl -s -I -L "$1")

# Extraire l'en-tête "Location" et afficher l'URL réelle
real_url=$(echo "$response" | grep -i "Location:" | cut -d ' ' -f2)

# Afficher l'URL réelle
echo "$real_url"
