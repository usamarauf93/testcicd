pipeline{

    agent any
    stages{
        stage("Verify Tooling"){ 
            steps{
                sh '''
                    docker version
                    docker info
                    docker compose version
                    curl --version
                    jq --version
                '''
            }
        }
        stage("Prune Docker data"){
            steps{
                sh 'docker system prune -a --volumes -f'
            }
        }
        stage( "start Container"){
            steps{
                sh 'docker compose up -d --no-color --wait'
                sh 'docker compose ps'
            }
        }
        stage('Run test Against Container'){
            steps{
                sh "curl http://localhost:8080"
            }
        }
    }
    post{
        always{
            sh "docker compose down --remove-orphans -v"
            sh "docker compose ps"
        }
    }
}