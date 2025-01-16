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
                    sh '''
                    # Pastikan .env.example ada dan buat file .env jika belum ada
                    if [ ! -f ${PROJECT_DIR}/.env ]; then
                        echo ".env file tidak ditemukan, membuat .env dari .env.example"
                        cp ${PROJECT_DIR}/.env.example ${PROJECT_DIR}/.env
                    else
                        echo ".env file sudah ada, melanjutkan dengan konfigurasi."
                    fi

                    # Ganti konfigurasi database pada .env
                    sed -i "s/DB_HOST=127.0.0.1/DB_HOST=${CONTAINER_MYSQL}/g" ${PROJECT_DIR}/.env
                    sed -i "s/DB_DATABASE=laravel/DB_DATABASE=management/g" ${PROJECT_DIR}/.env
                    sed -i "s/DB_USERNAME=root/DB_USERNAME=root/g" ${PROJECT_DIR}/.env
                    sed -i "s/DB_PASSWORD=/DB_PASSWORD=oceanli0611/g" ${PROJECT_DIR}/.env
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
