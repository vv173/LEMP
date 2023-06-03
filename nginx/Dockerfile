FROM nginx:1.25.0-alpine3.17-slim

ARG PORT
ARG DATE="2023-12-05T23:06:00.000Z"

LABEL "org.opencontainers.image.created"="${DATE}"
LABEL "org.opencontainers.image.authors"="Viktor Vodnev"

ENV PORT=$PORT

RUN apk add --update --no-cache curl

COPY ./nginx.conf /etc/nginx/nginx.conf
RUN sed -i "s/listen 80;/listen $PORT;/g" /etc/nginx/nginx.conf

EXPOSE $PORT

HEALTHCHECK --interval=4s --timeout=20s --start-period=2s --retries=3 \
    CMD curl -f http://localhost:${PORT}/ || exit 1

ENTRYPOINT ["nginx", "-g", "daemon off;"]