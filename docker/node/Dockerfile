FROM node:14.18-alpine

COPY ./src /var/www
WORKDIR /var/www
RUN npm install
RUN npm run build
CMD ["npm", "run", "start"]