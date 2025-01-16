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
                    // Ganti konfigurasi database pada .env
                    sh '''
                    sed -i 's/DB_HOST=127.0.0.1/DB_HOST=${CONTAINER_MYSQL}/g' ${PROJECT_DIR}/.env
                    sed -i 's/DB_DATABASE=laravel/DB_DATABASE=management/g' ${PROJECT_DIR}/.env
                    sed -i 's/DB_USERNAME=root/DB_USERNAME=root/g' ${PROJECT_DIR}/.env
                    sed -i 's/DB_PASSWORD=/DB_PASSWORD=oceanli0611/g' ${PROJECT_DIR}/.env
                    '''
                }
            }
        }

        stage('Build and Start Containers') {
            steps {
                script {
                    // Build dan jalankan docker-compose
                    sh '''
                    # Memastikan untuk menurunkan container terlebih dahulu jika ada, lalu build dan jalankan
                    ${DOCKER_COMPOSE} -f ${PROJECT_DIR}/compose.yaml down || true
                    ${DOCKER_COMPOSE} -f ${PROJECT_DIR}/compose.yaml up -d --build
                    '''
                }
            }
        }

        stage('Run Migrations and Seed') {
    steps {
        script {
            // Menunggu beberapa detik untuk memberi waktu MySQL siap
            sleep time: 30, unit: 'SECONDS'

            // Menjalankan migrasi dan seed menggunakan docker-compose exec
            sh '''
            docker-compose exec -T laravel-app php artisan migrate --force
            docker-compose exec -T laravel-app php artisan db:seed --force
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
