FROM node:23-alpine3.20 

WORKDIR /app
ENV PATH /app/node_modules/.bin:$PATH

ENTRYPOINT  ["/bin/sh", "-c"]

CMD ["npm install && npm run watch && npm build"]

FROM nginx:1.27.4-alpine

WORKDIR /app/public

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
