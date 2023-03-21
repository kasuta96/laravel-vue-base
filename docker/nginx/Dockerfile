FROM nginx:1.23.2-alpine

COPY docker/nginx/conf/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/conf/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["nginx", "-g", "daemon off;"]
