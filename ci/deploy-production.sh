#!/bin/sh

VERSION="develop"

IMAGE="catalog-sconnect-web"

echo "Deploying Version: $VERSION"


# docker tag $IMAGE:$VERSION 463057111838.dkr.ecr.us-west-2.amazonaws.com/$IMAGE:latest
docker tag $IMAGE:$VERSION 463057111838.dkr.ecr.us-west-2.amazonaws.com/$IMAGE:$VERSION

# docker push 463057111838.dkr.ecr.us-west-2.amazonaws.com/$IMAGE:latest
docker push 463057111838.dkr.ecr.us-west-2.amazonaws.com/$IMAGE:$VERSION
