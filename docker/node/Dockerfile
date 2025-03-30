# build dev assets
FROM node:23-alpine

WORKDIR /app

ENTRYPOINT  ["/bin/sh", "-c"]

# Install on launch, build to produce entrypoints and manifest.json, then watch for changes
CMD ["npm install && npm run watch"]
