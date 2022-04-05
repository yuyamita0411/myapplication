resource "aws_ecs_task_definition" "webapp-task" {
    family                = "webapp-nginx"
    container_definitions = file("./container_definitions/service.json")
    task_role_arn = data.terraform_remote_state.aws_iam.outputs.ecs_task_role_arn
    network_mode  = "bridge"
}