// pages/courseDetail/courseDetail.js
var app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    hostUrl: app.use.hostImg,
    dataOne:{}
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.hideShareMenu();//取消转发
    var title = options.title;  //课程标题
    var id = options.course_id;  //课程id options.course_id
    var taht = this;
    //更改头部标题
    wx.setNavigationBarTitle({
      title: title,
    });
    wx.request({
      url: app.use.hostUrl + '/wx/Course/course_detail', //仅为示例，并非真实的接口地址
      data: {
        cid: id
      },
      header: {
        'content-type': 'application/json' // 默认值
      },
      success: function (res) {
        var data = res.data;
        if (data.status != 1) {
          wx.showToast({
            title: data.msg,
            icon: 'none',
            duration: 2000
          });
          return false;
        }
        taht.setData({
          dataOne: data.data
        });
        // console.log(data.data);
      },
      fail:function (e) {
        wx.showToast({
          title: '网络异常!',
          duration: 2000
        });
      },
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  }
})