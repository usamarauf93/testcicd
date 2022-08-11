pipeline{

    agent any
    stages{
        stage('Git BZT command'){
            steps{
                sh 'bzt execution.yml'
            }
        }
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
                sh 'docker compose up'
            }
        }
        stage('Run test Against Container'){
            steps{
                sh "curl http://localhost:8090"
            }
        }
    }
}