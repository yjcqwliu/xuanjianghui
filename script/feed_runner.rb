start_time = Time.now
puts "start:#{start_time}"
SnsMyActivity.find(:all, :conditions => [" share = true  " ],:order => " updated_at desc ", :limit => 5000).each do |notice|
  begin
   current_time = Time.now
   title = notice.activity.act_subject
   if notice.activity.act_text
		content = notice.activity.act_text.act_description.chars[0,20].gsub("\n","")
   end
		#res_note = notice.sns_user.xn_session.invoke_method("xiaonei.notifications.send", 
		#												:to_ids => notice.to_xid, 
		#												:notification => content)
puts "--------title:#{title}-----content:#{content}---------"
		res_feed = notice.sns_user.xn_session.invoke_method("xiaonei.feed.publishTemplatizedAction", 
														:title_data => "{\"title\":\"#{title}\"}",
														:body_data => "{\"content\":\"#{content}\"}",
														:template_id => 1)
    puts "#{current_time}: process user #{notice.sns_user.id}:  #{res_feed.inspect} "
    
    #notice.share = false
    notice.save
  rescue Exception => exp
    puts "exp: #{exp.inspect}"
  end
end


