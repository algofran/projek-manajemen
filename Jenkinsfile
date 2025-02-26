pipeline {
    agent any
    environment {
        DOCKER_COMPOSE = "/usr/local/bin/docker-compose" // Path docker-compose
        PROJECT_DIR = "/root/.jenkins/workspace/Aplikasi" // Path direktori Laravel
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
                        if [ -f ${PROJECT_DIR}/.env.example ]; then
                            cp ${PROJECT_DIR}/.env.example ${PROJECT_DIR}/.env
                        else
                            echo "Error: .env.example tidak ditemukan. Pastikan file ini ada di repository."
                            exit 1
                        fi
                    else
                        echo ".env file sudah ada, melanjutkan dengan konfigurasi."
                    fi

                    # Ganti konfigurasi database pada .env
                    sed -i "s/^DB_HOST=.*/DB_HOST=${CONTAINER_MYSQL}/" ${PROJECT_DIR}/.env
                    sed -i "s/^DB_DATABASE=.*/DB_DATABASE=management/" ${PROJECT_DIR}/.env
                    sed -i "s/^DB_USERNAME=.*/DB_USERNAME=root/" ${PROJECT_DIR}/.env
                    sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=oceanli0611/" ${PROJECT_DIR}/.env
                    '''
                }
            }
        }
        stage('Build and Start Containers') {
            steps {
                script {
                    sh '''
                    # Stop dan hapus container jika ada
                    ${DOCKER_COMPOSE} -f ${PROJECT_DIR}/compose.yaml down
                    # Build dan jalankan container
                    ${DOCKER_COMPOSE} -f ${PROJECT_DIR}/compose.yaml up -d --build
   
                    '''
                }
            }
        }
        stage('Fix Permissions') {
            steps {
                script {
                    sh '''
                    # Perbaiki izin direktori storage dan cache
                    docker exec -i ${CONTAINER_APP} chmod -R 775 /var/www/storage /var/www/bootstrap/cache
                    docker exec -i ${CONTAINER_APP} chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
                    '''
                }
            }
        }
        stage('Install Dependencies') {
            steps {
                script {
                    sh '''
                    # Jalankan composer install di dalam container
                    docker exec -i ${CONTAINER_APP} composer install --no-dev --optimize-autoloader
                    '''
                }
            }
        }
        stage('Run Migrations and Seed') {
            steps {
                script {
                    sh '''
                    echo "Menjalankan perintah Artisan..."
                    docker exec -i ${CONTAINER_APP} php artisan key:generate || echo "Gagal membuat app key"
                    docker exec -i ${CONTAINER_APP} php artisan migrate --force || (echo "Migration gagal, cek log!" && exit 1)
                    docker exec -i ${CONTAINER_APP} php artisan db:seed --force || (echo "Seeder gagal, cek log!" && exit 1)
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
