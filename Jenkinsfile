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
                sh 'docker compose up -d'

            }
        }
        stage(" Install project dependencies"){
            step{
                sh 'composer install'
            }
        }
        stage('Hit url With Lucky Number'){
            steps{
                sh "curl http://localhost:8090/lucky/number"
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