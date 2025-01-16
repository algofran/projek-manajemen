pipeline {
    agent any
    environment {
        DOCKER_COMPOSE = "/usr/local/bin/docker-compose" // Path docker-compose
        PROJECT_DIR = "/var/www/aplikasi" // Path direktori Laravel
        CONTAINER_APP = "laravel-app" // Nama container Laravel
        CONTAINER_MYSQL = "mysql" // Nama container MySQL
    }
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        stage('Setup Environment') {
            steps {
                script {
                    // Menjalankan docker-compose dengan file docker-compose.dev.yml
                    sh '''
                    # Menjalankan docker-compose dengan file dev configuration
                    ${DOCKER_COMPOSE} -f ${PROJECT_DIR}/compose.yml -p dev up -d
                    '''
                }
            }
        }
        stage('Build and Start Containers') {
            steps {
                script {
                    sh '''
                    # Build dan jalankan docker-compose
                    ${DOCKER_COMPOSE} -f ${PROJECT_DIR}/compose.yaml down || true
                    ${DOCKER_COMPOSE} -f ${PROJECT_DIR}/compose.yaml up -d --build
                    '''
                }
            }
        }
        stage('Run Migrations and Seed') {
            steps {
                script {
                    sh '''
                    # Menjalankan migrasi dan seed tanpa menggunakan sh -c, langsung pada PHP
                    docker exec -i ${CONTAINER_APP} php artisan migrate --force
                    docker exec -i ${CONTAINER_APP} php artisan db:seed --force
                    '''
                }
            }
        }
    }
    post {
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed!'
        }
    }
}
