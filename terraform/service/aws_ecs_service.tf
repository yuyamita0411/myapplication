resource "aws_ecs_service" "webapp-nginx" {
    name            = "webapp-nginx"
    cluster         = aws_ecs_cluster.groupware-ecs-cluster.id
    task_definition = aws_ecs_task_definition.webapp-task.arn
    desired_count   = 2
    health_check_grace_period_seconds = 3600
    launch_type     = "EC2"

    load_balancer {
        target_group_arn = aws_lb_target_group.http.arn
        container_name   = "webapp-nginx"
        container_port   = "80"
    }

    load_balancer {
        target_group_arn = aws_lb_target_group.http_vue.arn
        container_name   = "myapp-vue"
        container_port   = "5051"
    }
}