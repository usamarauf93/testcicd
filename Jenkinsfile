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
        stage("SSH Into Container "){
            steps{
                sh "docker exec -i symfony-cicd /bin/bash"
 
            }
        }
        stage("Add Project Dependencies "){
            steps{
                sh "php --version"
            }
        }
        stage('run test case'){
            steps{
                sh 'pwd'
                sh "docker exec -t -w /var/www/html/api api vendor/bin/phpunit "
            }
        }
    }
    post{
        always{
            sh "exit"
            // sh "docker compose down --remove-orphans -v"
            // sh "docker compose ps"
        }
    }
}