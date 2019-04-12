#!/bin/sh
set -e

VERSION="develop"

IMAGE="catalog-sconnect-web"

echo "Building Version: $VERSION"

docker --version


docker build -t $IMAGE:$VERSION .
