pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git branch: 'penelitian', url: 'https://github.com/algofran/projek-manajemen.git'
            }
        }
        stage('Build Docker Images') {
            steps {
                sh 'docker-compose -f compose.yaml build'
            }
        }
        stage('Deploy Services') {
            steps {
                sh 'docker-compose -f compose.yaml down || true'
                sh 'docker-compose -f compose.yaml up -d'
            }
        }
    }
}
