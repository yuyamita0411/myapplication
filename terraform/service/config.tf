terraform {
    backend "s3" {
        bucket = "gwbucket"
        key    = "gwareterraform/service/terraform.tfstate"
        region = "ap-northeast-1"
    }
}
provider "aws" {
    region = "ap-northeast-1"
}