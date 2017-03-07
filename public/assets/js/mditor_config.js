var M_C_1 = {
    type: {
        message: 'The type is not valid',
        validators: {
            notEmpty: {
                message: '为了更好的分类，请选择一个话题类型吧'
            },
        }
    },
    figure: {
        message: 'The image is not valid',
        validators: {
            file: {
                extension: 'png,gif,jpg,jpeg',
                type: 'image/png,image/gif,image/jpeg',
                maxSize: 3*1024*1024,
                message: '请上传正确的图片格式(png,gif,jpg,jpeg)，且图片不要大于3M.'
            },
            notEmpty: {
                message: '请为话题设置一张封面吧'
            }
        }
    },
    title: {
        message: 'The title is not valid',
        validators: {
            notEmpty: {
                message: '话题标题不能为空哦'
            },
            stringLength: {
                min: 5,
                max:50,
                message: '话题标题请控制在5-30字之内'
            },
        }
    },
    theme: {
        validators: {
            notEmpty: {
                message: '请选择一个主题'
            },
        }
    },
    summary:{
        validators: {
            notEmpty: {
                message: '请简单的概述下吧'
            },
            stringLength: {
                max: 225,
                message: '概述的内容请不要太多。'
            },
        }
    },
    content: {
        validators: {
            notEmpty: {
                message: '话题内容不能为空'
            },
            stringLength: {
                min: 15,
                message: '话题内容请不要小于15个字。'
            },
        }
    }
};
var M_C_2 = {
    type: {
        message: 'The type is not valid',
        validators: {
            notEmpty: {
                message: '为了更好的分类，请选择一个话题类型吧'
            },
        }
    },
    title: {
        message: 'The title is not valid',
        validators: {
            notEmpty: {
                message: '问题标题不能为空哦'
            },
            stringLength: {
                min: 5,
                max:50,
                message: '问题标题请控制在5-30字之内'
            },
        }
    },
    theme: {
        validators: {
            notEmpty: {
                message: '请选择一个主题'
            },
        }
    },

    content: {
        validators: {
            notEmpty: {
                message: '问题内容不能为空'
            },
            stringLength: {
                min: 15,
                message: '问题内容请不要小于15个字。'
            },
        }
    }
};

var M_C_3 = {
    type: {
        message: 'The type is not valid',
        validators: {
            notEmpty: {
                message: '为了更好的分类，请选择一个话题类型吧'
            },
        }
    },
    figure: {
        message: 'The image is not valid',
        validators: {
            file: {
                extension: 'png,gif,jpg,jpeg',
                type: 'image/png,image/gif,image/jpeg',
                maxSize: 3*1024*1024,
                message: '请上传正确的图片格式(png,gif,jpg,jpeg)，且图片不要大于3M.'
            },
            notEmpty: {
                message: '请为视频设置一张封面吧'
            }
        }
    },
    title: {
        message: 'The title is not valid',
        validators: {
            notEmpty: {
                message: '转载标题不能为空哦'
            },
            stringLength: {
                min: 5,
                max:50,
                message: '转载标题请控制在5-30字之内'
            },
        }
    },
    theme: {
        validators: {
            notEmpty: {
                message: '请选择一个主题'
            },
        }
    },
    summary:{
        validators: {
            notEmpty: {
                message: '请简单的概述下转载吧'
            },
            stringLength: {
                max: 225,
                message: '转载概述的内容请不要太多。'
            },
        }
    },
    source:{
        group: '.group',
        validators: {
            notEmpty: {
                message: '请填写信息来源'
            },
        }
    },
    sourceUrl:{
        validators: {
            notEmpty: {
                message: '信息URL来源不能为空'
            },
        }
    },
    content: {
        validators: {
            notEmpty: {
                message: '话题内容不能为空'
            },
            stringLength: {
                min: 15,
                message: '话题内容请不要小于15个字。'
            },
        }
    }
};

var M_C_4 = {
    type: {
        message: 'The type is not valid',
        validators: {
            notEmpty: {
                message: '为了更好的分类，请选择一个话题类型吧'
            },
        }
    },
    title: {
        message: 'The title is not valid',
        validators: {
            notEmpty: {
                message: '视频标题不能为空哦'
            },
            stringLength: {
                min: 5,
                max:50,
                message: '视频标题请控制在5-30字之内'
            },
        }
    },
    figure: {
        message: 'The image is not valid',
        validators: {
            file: {
                extension: 'png,gif,jpg,jpeg',
                type: 'image/png,image/gif,image/jpeg',
                maxSize: 3*1024*1024,
                message: '请上传正确的图片格式(png,gif,jpg,jpeg)，且图片不要大于3M.'
            },
            notEmpty: {
                message: '请为视频设置一张封面吧'
            }
        }
    },
    theme: {
        validators: {
            notEmpty: {
                message: '请选择一个主题'
            },
        }
    },
    summary:{
        validators: {
            notEmpty: {
                message: '请简单的概述下吧'
            },
            stringLength: {
                max: 225,
                message: '概述的内容请不要太多。'
            },
        }
    },
    source:{
        group: '.group',
        validators: {
            notEmpty: {
                message: '请填写信息来源'
            },
        }
    },
    sourceUrl:{
        validators: {
            notEmpty: {
                message: '信息URL来源不能为空'
            },
        }
    },

};