pipeline {
    agent any
    environment {
        DOCKER_COMPOSE = "/usr/local/bin/compose" // Path docker-compose
        PROJECT_DIR = "/var/www/aplikasi" // Path direktori Laravel
    }
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        stage('Run Dev Environment') {
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
        stage('Run Migrations and Seed') {
            steps {
                script {
                    sh '''
                    # Menjalankan migrasi dan seed tanpa menggunakan sh -c, langsung pada PHP
                    docker exec -i ${PROJECT_DIR}_app php artisan migrate --force
                    docker exec -i ${PROJECT_DIR}_app php artisan db:seed --force
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
