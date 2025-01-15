pipeline {
    agent any
    environment {
        DOCKER_IMAGE = "laravel-app:latest" // Nama image Docker
    }
    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'penelitian', url: 'https://github.com/algofran/projek-manajemen.git'
            }
        }
        stage('Build Docker Image') {
            steps {
                script {
                    sh 'docker build -t ${DOCKER_IMAGE} .'
                }
            }
        }
        stage('Run Docker Container') {
            steps {
                script {
                    sh 'docker stop laravel-app || true'
                    sh 'docker rm laravel-app || true'
                    sh 'docker run -d --name laravel-app -p 80:80 ${DOCKER_IMAGE}'
                }
            }
        }
    }
    post {
        always {
            echo 'Pipeline completed!'
        }
    }
}
