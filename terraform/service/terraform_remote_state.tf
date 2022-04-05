data "terraform_remote_state" "aws_iam" {
    backend = "s3"

    config = {
        bucket = "gwbucket"
        key    = "gwareterraform/iam/terraform.tfstate"
        region = "ap-northeast-1"
    }
}
data "terraform_remote_state" "vp" {
    backend = "s3"

    config = {
        bucket = "gwbucket"
        key    = "gwareterraform/vpc/terraform.tfstate"
        region = "ap-northeast-1"
    }
}
